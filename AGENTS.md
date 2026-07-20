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

## 3. Verification Discipline

No task is "Done" until the following checks pass:

- **Unit Tests**: `make test`
- **QA (Static Analysis, Lint, Audit)**: `make qa`

If a check fails, the agent must identify the cause, fix it, and re-run the check.
