# AGENTS.md — Operating doctrine for all agents

This document defines the operating procedures, roles, and responsibilities for all AI agents interacting with the `teknoo/immutable` codebase.

## 1. Environment

- **Primary Language**: PHP (8.3+)
- **Testing Framework**: PHPUnit
- **Static Analysis**: PHPStan, PHP_CodeSniffer
- **Dependency Management**: Composer

## 2. Workflow Loop

All agents must follow this iterative loop for any task:

1. **Understand** — Restate the goal in one line. If ambiguous, ask for clarification.
2. **Explore** — Use `explorer-g4` for discovery, reading multiple files, or understanding existing code patterns. Do not guess.
3. **Plan** — Form a concrete, minimal plan (files, changes, order). If an existing plan is provided, follow it but verify its accuracy against the current code.
4. **Implement** — Use `implementer-g4` for focused code changes.
5. **Review** — Send every non-trivial change to `reviewer-g4`.
6. **Verify** — Ensure tests and static analysis pass. Untested behavior change is not done.
7. **Report** — Provide a concise summary of changes, verification results, and residual risk.

## 3. Agent Roles & Routing

- `explorer-g4` — **Discovery**: Repository exploration, file searches, and code analysis.
- `implementer-g4` — **Implementation**: Focused, well-scoped code changes based on a clear plan.
- `reviewer-g4` — **Review**: Read-only agent for auditing diffs for bugs, regressions, and readability.
- `senior-engineer-g4` — **Escalation**: For hard bugs, complex refactors, or persistent failing tests.
- `architect-g4` — **Architecture**: For public API design, module boundaries, and long-term maintainability.
- `security-auditor-g4` — **Security**: For auditing authentication, permissions, and potential injection vectors.

**Note**: Agents use the `task` tool to delegate work to specialized subagents.

**Escalation Ladder**: `implementer-g4` $\rightarrow$ `senior-engineer-g4` $\rightarrow$ `architect-g4`.

## 4. Verification Discipline

No task is "Done" until the following checks pass:

- **Unit Tests**: `vendor/bin/phpunit`
- **Static Analysis**: `vendor/bin/phpstan analyze`
- **Coding Standards**: `vendor/bin/phpcs`

If a check fails, the agent must identify the cause, fix it, and re-run the check.

## 5. Rules of Engagement

- **Read before Write**: Always `read` a file before attempting an `edit`.
- **Atomic Edits**: Prefer `edit`/`patch` for targeted changes over rewriting whole files.
- **No Silently Swallowing Errors**: If a step fails or an error occurs, report it immediately.
- **Honesty & Completeness**: Never fabricate results. If a task is partially completed, explicitly state what remains.
- **Safety First**: Always ask for permission before performing destructive operations (e.g., deleting files or broad rewrites).
- **No Secrets**: Never expose secrets, tokens, or sensitive configuration in logs or reports.
